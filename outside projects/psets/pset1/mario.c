/**
 * mario.c
 * 
 * Annie Chen
 * annie.chen@yale.edu
 * 
 * prints a half pyramid according to user imputted height
 */

#include <stdio.h>
#include <cs50.h>

// prototypes
void spaces(int n);
void hashes(int n);
void newLine();

int main(void)
{
  // establishes integer height of pyramid in global scope
    int height;
  
    do 
    {
        // promopt user to enter half pyramid's height h integer
        printf("height of pyramid: ");
        // stores user imput as variable h 
        height = GetInt();
    }
        // must be between 1-23
        // if not, reprompt
     while (height < 0 || height > 23);

  // each time c increases, another row is added.  
    for (int count = 2;  count < height + 2; count++) 
    {
    // print spaces
        spaces(height - count + 1);
    
    // print hashes
        hashes(count);
    
    // new line
        newLine();
        
    }
}

// prints n hashes, but does not move to new line
void hashes(int n)
{
    for (int i = 0 ; i < n; i++)
    {
        printf ("#");
    }
  
}

// prints n spaces, does not move to new line
void spaces(int n)
{
    for (int i = 0 ; i < n; i++) 
    {
        printf (" ");
    } 
  
}

// prints new line
void newLine()
{
    printf("\n");
}