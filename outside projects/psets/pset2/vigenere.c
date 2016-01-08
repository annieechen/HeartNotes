/**
 * vigenere.c
 * 
 * Annie Chen
 * annie.chen@yale.edu
 * 
 * uses inputted keyword to encrypt messages using Vigenère’s cipher
 * accepts a keyword of alphabetical characters
 * uses each character in keyword as integer 
 * shifts message's character to the right
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
        printf("please include a keyword! \n");
        return 1;
    }
    
    // establishes 1st indexed argment as keyword and stores length of keyword
    string keyword = argv[1];
    int kwlength = strlen(keyword);
   
    // checks if keyword is a string of alphabetical characeters
    for (int i = 0, n = strlen(keyword); i < n; i++)
    {
        if (!isalpha(keyword[i]))
        {
            printf("a keyword with only alphabetical characters please!");
            return 1;
        }
    }
    
    // enter text to be encrypted, store as string
    string message = GetString();
    
    // establishes counter for keyword index (outside for loop)
    int keywordIndex = 0;
    
    // runs through each character in message string, encrypts each accord
    for (int i = 0, n = strlen(message); i < n; i++)
    {   
        // makes keyword values loop around when they reach the end of string
        // establishes the integer to be used as the key for each run of loop
        int charkey = keyword[keywordIndex % (kwlength)];
        int key;
        keywordIndex++;
        
        // if key is a capital letter, convert to 0-25 value 
        if ((charkey > 64) && (charkey < 91 ) )
        {
            key = charkey - 'A';
        } 
        
        // if key is a lowercase letter, convert to 0-25 value
        else if ((charkey > 96) && (charkey < 127 ))
        {
            key = charkey - 'a';
        }

        // if character is a capital letter, switch using key and print
        if (isupper(message[i]))
        {
            char switched = encrypt (65, message[i], key);
            printf ("%c", switched);
        } 
        
        // if character is a lowercase letter, switch using key and print
        else if (islower(message[i]))
        {
            char switched = encrypt (97, message[i], key);
            printf ("%c", switched);
        } 
        
        // if character is a space, print 
        else 
        {
            printf("%c",message[i]);
            // reduce counting variable for key by 1
            keywordIndex = keywordIndex - 1;
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
