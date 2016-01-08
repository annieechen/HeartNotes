/**
 * caesar.c
 * 
 * Annie Chen
 * annie.chen@yale.edu
 * 
 * takes user inputted integer key and shifts all characters right by that key
 * keeps capital and lowercase characters consistent
 * 
*/

#include <stdio.h>
#include <stdlib.h>
#include <cs50.h>
#include <string.h>
#include <ctype.h>

// prototypes
char encrypt(int UpOrLow, char character, int key);

int main(int argc, string argv[])
{
    // checks length of argc; if not 2, then returns error
    if (argc != 2) 
    {
        printf("please include an integer key! \n");
        return 1;
    }
    
    // turns string "key" into integer
    int key = atoi(argv[1]);
    // if string key cannot be converted to integer, prints error message
    if (key == 0) 
    {
        printf("Error! Please make command line integer]n");
    }
    
    // enter text to be encrypted, store as string
    string message = GetString();
    
    // encrypts text
    for (int i = 0, n = strlen(message); i < n; i++)
    {
        // uppercase
        if (isupper(message[i]))
        {
            char switchedchar = encrypt ('A', message[i], key);
            printf ("%c", switchedchar);
            
        } 
        // lowercase
        else if (islower(message[i]))
        {
            char switchedchar = encrypt ('a', message[i], key);
            printf ("%c", switchedchar);
        }
        // not a letter
        else 
        {
            printf("%c", message[i]);
        }
    }
    printf("\n");
}

/**function takes variables:
     *UpOrLow; use 'A' for capitals and 'a' for lowercase
     *character; character to be encrypted
     *key; number value that character is shifted by
 *uses key to shift character
*/

char encrypt(int UpOrLow, char character, int key)
{
    return ((((character + key) - UpOrLow) % 26) + UpOrLow); 
}

