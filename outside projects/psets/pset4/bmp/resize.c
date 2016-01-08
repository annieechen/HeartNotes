/**
 * resize.c
 *
 * Annie Chen
 * annie.chen@yale.edu
 * Computer Science 50
 * Problem Set 4
 *
 * resizes an image by some factor n, outputs it to a new file.
 */
       
#include <stdio.h>
#include <stdlib.h>

#include "bmp.h"

int main(int argc, char* argv[])
{
    // ensure proper usage
    if (argc != 4)
    {
        printf("Usage: ./copy infile outfile\n");
        return 1;
    }

    // check that n is valid, save as variable
    int resizer = atoi(argv[1]);
    if (resizer < 1 || resizer > 100)
    {
        printf("n must be between 1 and 100\n");
        return 1;
    }
    
    // remember filenames
    char* infile = argv[2];
    char* outfile = argv[3];

    // open input file 
    FILE* inptr = fopen(infile, "r");
    if (inptr == NULL)
    {
        printf("Could not open %s.\n", infile);
        return 2;
    }

    // open output file
    FILE* outptr = fopen(outfile, "w");
    if (outptr == NULL)
    {
        fclose(inptr);
        fprintf(stderr, "Could not create %s.\n", outfile);
        return 3;
    }

    // read infile's BITMAPFILEHEADER
    BITMAPFILEHEADER bf;
    fread(&bf, sizeof(BITMAPFILEHEADER), 1, inptr);

    // read infile's BITMAPINFOHEADER
    BITMAPINFOHEADER bi;
    fread(&bi, sizeof(BITMAPINFOHEADER), 1, inptr);

    // ensure infile is (likely) a 24-bit uncompressed BMP 4.0
    if (bf.bfType != 0x4d42 || bf.bfOffBits != 54 || bi.biSize != 40 || 
        bi.biBitCount != 24 || bi.biCompression != 0)
    {
        fclose(outptr);
        fclose(inptr);
        fprintf(stderr, "Unsupported file format.\n");
        return 4;
    }
    
    // create new output header
    BITMAPFILEHEADER bfNew = bf;
    BITMAPINFOHEADER biNew = bi;
    
    // changes to new size and width of image
    biNew.biHeight = bi.biHeight * resizer;
    biNew.biWidth = bi.biWidth * resizer;
    
    // stores old padding, calculates new padding
    // determine padding for scanlines
    int padding =  (4 - (bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;
    int paddingNew =(4 - (biNew.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;
    
    // changes information on size of image and file
    // takes new height, width, and padding
    biNew.biSizeImage = (abs(biNew.biHeight) * biNew.biWidth * sizeof(RGBTRIPLE)) + (abs(biNew.biHeight) * paddingNew);
   
    // new bfSize  = new biSizeImage +  size of header
    bfNew.bfSize = biNew.biSizeImage + (bf.bfSize - bi.biSizeImage);
    
    // write outfile's BITMAPFILEHEADER
    fwrite(&bfNew, sizeof(BITMAPFILEHEADER), 1, outptr);

    // write outfile's BITMAPINFOHEADER
    fwrite(&biNew, sizeof(BITMAPINFOHEADER), 1, outptr);

   
    // iterate over infile's scanlines
    for (int i = 0, biHeight = abs(bi.biHeight); i < biHeight; i++)
    {  
        // vertical repeating
        for (int h = 0; h < resizer; h++)
        {
            // iterate over pixels in scanline
            for (int j = 0; j < bi.biWidth; j++)
            {
                // temporary storage
                RGBTRIPLE triple;
    
                // read RGB triple from infile
                fread(&triple, sizeof(RGBTRIPLE), 1, inptr);
    
                // write RGB triple to outfile
                for (int w = 0; w < resizer; w++)
                {
                    fwrite(&triple, sizeof(RGBTRIPLE), 1, outptr);
                }    
            }  
            // skip over old padding, if any
            fseek(inptr, padding, SEEK_CUR);
    
            // then add it back (to demonstrate how)
            for (int k = 0; k < paddingNew; k++)
            {
                fputc(0x00, outptr);
            }
            
            // go back to beginning of line    
            fseek(inptr, -(bi.biWidth * sizeof(RGBTRIPLE) + padding), SEEK_CUR);
        }
        // once first scanline done, move pointer forward to next line
        fseek(inptr, bi.biWidth * sizeof(RGBTRIPLE) + padding, SEEK_CUR);
        
        
    }

    // close infile
    fclose(inptr);

    // close outfile
    fclose(outptr);

    // that's all folks
    return 0;
}
