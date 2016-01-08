/**
 * initials.c
 * 
 * Annie Chen
 * annie.chen@yale.edu
 * 
 * takes user inputted name and prints out the initials in capital letters
 * user can input multiple spaces, program will still output correct initials
 * 
*/

#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <ctype.h>
int main(void)
{
    // gets string for "First Last"
    string name = GetString();
    
    // checks to see if first character is a letter
    // if so, prints it in caps
    if (isalpha(name[0])) 
    {
        printf ("%c", toupper(name[0]));
    } 
    
    // checks to see if character is a space
    // if so, prints the next character in caps
    char nextInitial;
    for (int i = 0, n = strlen(name); i < n; i++)
    {
        if ((name[i] == ' ') && (isalpha(name[i + 1]))) 
        {
            nextInitial = name[i + 1];
            printf ("%c", toupper(nextInitial));
        }
    }
    // prints new line once initials are printed
    printf("\n");
  
}