/**
 * generate.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Generates pseudorandom numbers in [0,LIMIT), one per line.
 *
 * Usage: generate n [s]
 *
 * where n is number of pseudorandom numbers to print
 * and s is an optional seed
 */
 
 // include definition for extra functions
#define _XOPEN_SOURCE

// include libraries
#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

// constant
#define LIMIT 65536

int main(int argc, string argv[])
{
    // Checks to see there is at least 1 but not more than 2 command line args
    // If not, prints out proper usage of generate.c
    if (argc != 2 && argc != 3)
    {
        printf("Usage: generate n [s]\n");
        return 1;
    }

    // convert the first command line string argv[1] into an integer
    // n is number of ints to be generated 
    int n = atoi(argv[1]);

    // if a seed is provided, uses it as a parameter of the srand48 function 
    // if no seed provided, uses time(NULL), (current time in secs), as seed
    // initializes the drand48 function
    
    if (argc == 3)
    {
        srand48((long int) atoi(argv[2]));
    }
    else
    {
        srand48((long int) time(NULL));
        
        // uncomment line below to print the time, which is used as the seed
        // printf("%ti\n", time(NULL));
    }

    // loops through n times to print each generated number on a seperate line
    // drand48 returns floats btwn 0 and 1 
    // must multiply by 65536 before converting to int
    for (int i = 0; i < n; i++)
    {
        printf("%i\n", (int) (drand48() * LIMIT));
    }

    // success
    return 0;
}