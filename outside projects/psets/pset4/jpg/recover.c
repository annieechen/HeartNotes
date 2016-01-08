/**
 * recover.c
 *
 * Annie Chen
 * annie.chen@yale.edu
 * 
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */
       
#include <stdio.h>
#include <stdlib.h>
#include <stdint.h>

// establishes type BYTE
typedef uint8_t  BYTE;

// temp storage for reading each block   
BYTE buffer[512];

// counter for file titles
int jpgcount = 0;

int main(void)
{
    // open memory card file
    FILE* file = fopen("card.raw", "r");
    // checks to see if card.raw can be opened
    if (file == NULL)
    {
        printf("file could not be opened \n");
        return 1;
    }
    
    // makes and clears output file
    FILE* outptr = NULL;
    
    char fileName[8];
    // while not at end of file
    while (!feof(file))
    {
        // find beginning of jpg images on card
        if (buffer[0] == 0xff && buffer[1] == 0xd8 && buffer[2] == 0xff && 
           (buffer[3] == 0xe0 || buffer[3] == 0xe1))
        {
            // checks if file is empty
            if (outptr != NULL) 
            {
                fclose(outptr);
            }
           
            // makes string of file names 
            sprintf(fileName, "%03d.jpg", jpgcount);
            jpgcount++;
           
            // makes new files w/ names and writes values to them     
            outptr = fopen(fileName, "w"); 
            fwrite(buffer, sizeof(buffer), 1, outptr);
        } 
            
        // once first image is found, continue writing the rest to new files
        else if(jpgcount > 0)
        {
            fwrite(buffer, sizeof(buffer), 1, outptr);
        }
        fread(&buffer, sizeof(BYTE), 512, file);
    }
    // close files   
    fclose(file);
    fclose(outptr);
 
    // exit program
    return 0;
}
