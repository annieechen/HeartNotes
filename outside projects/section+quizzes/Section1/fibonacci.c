#include<stdio.h>
#include<cs50.h>

//prototype
int fib(int n)
{ 
    if (n==0 || n == 1) {
        return 1;
    }
    return fib(n-1) + fib(n-2);
}
int main (int argc, string argv [])
{
    //calculate the nth fibonacci number
    //take 'n' from the command line
    if ( argc > 1)
    {
        int n = atoi(argv[1]);
        printf("the %ith fibonacci numner is %i\n", n, fib(n));
    }
}