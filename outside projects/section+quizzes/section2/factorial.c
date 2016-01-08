 
#include <stdio.h>


int factorial (int n);
int main (void)
{
    int x = factorial(4);
    printf ("%d",x);

}

int factorial (int n)
{
    int answer = n;
    if (n==1)
    {
        return 1;
    } 
    else 
    {
        for (int counter = n; counter > 1; counter --)
        {
            answer = answer*(counter -1 );
        }
    } return answer;    
}