#include <stdio.h>
#include <cs50.h>



void sort (int array[], int n);
int n;
int main (void)
{
    int array[] = {3,6,2};
    sort(array, 3);
    
    for (int i = 0; i < n; i++)
    {
        printf("%i", array[i]);
    }
    printf("\n");
}

void sort (int array[], int n)
{
    for (int i = 1; i < n; i ++)
    {
       int j = i - 1;
       int elem = array [i];
       while ( j >= 0 && elem < array[j])
       {
           array[j+1] = array[j];
        j--;
       }
       array[j+1] = elem;
    }
}

