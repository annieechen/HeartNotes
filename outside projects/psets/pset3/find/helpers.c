/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>
#include <math.h>
#include "helpers.h"

/**
 * uses binary search to search through an array in O(log(n))
 * Returns true if value is in array of n values, else false.
 */
 
 // value = value to be found
 // values[] = array to be searching in
 // n = number of integers in array
 

bool search(int value, int values[], int n)
{
    // checks to make sure array length is not negative
    if (n < 0)
    {
        return false;
    }
    int min = 0;
    int max = n - 1;
    int guess;
    
    while (max >= min) 
    {
        // makes guess as middle of array to be searched
        // rounds down if number of elements to be searched is odd
        guess = floor((min + max) / 2);
        // if number is found 
        if (values[guess] == value) 
        {
            return true;
        } 
        
        // searches in right half 
        else if (values[guess] < value) 
        {
            min = guess + 1;
        } 
        // searches in left half 
        else 
        {
            max = guess - 1;
        } 
        
    }
    // if value is not found in the array
    return false;
}
    
    
/**
 * Sorts array of n values using insertion sort
    * insertion sort takes first unsorted element (starting with second element)
    * compares that element to all elements in unsorted list, starting from left
    * as that element is sorted left, moves all the elements to the right of it
    * when that element is placed properly in sorted list, 
    * move to next element on unsorted list
 */
void sort(int values[], int n)
{
    // uses 1 instead of 0 because first element is considered its own array
    // thus, it is sorted already
    for (int i = 1; i < n; i++)
    {
        int element = values[i];
        int j = i;
        while ( j > 0 && element < values[j - 1])
        {
            values[j] = values[j - 1];
            j--;
        }
        values[j] = element;
    }
}
