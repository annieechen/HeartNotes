/**
 * water.c
 * 
 * Annie Chen
 * annie.chen@yale.edu
 * 
 * takes user imputted length of shower and converts it to bottles of water used
 */

#include <stdio.h>
#include <cs50.h>


int main(void)
{
    // prompts user to enter time of shower
    printf("Length of Shower in minutes: ");
    float time = GetFloat();
    
    // converts time to bottles of water
    int bottles = 12 * (time);

    // prints answer
    printf("bottles: %i\n", bottles);
    
}