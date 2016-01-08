#include <stdio.h>
#include <cs50.h>
#include <math.h>

//prototypes
void takeMoney (int type);
void quarters (int money);
void dimes (int money);
void nickels (int money);
void pennies (int money);

int main (void)
{
   int money = 350;
   int numCoins = 0;
  printf("%i \n", money);
   //printf("%i \n", type);
   printf("%i \n", numCoins);
}



void takeMoney (int type)
{
   int money ;
   money =  money - type;
   int  numCoins =  numCoins + 1;
}

void quarters (int money)
{
  takeMoney(25);
}

void dimes (int money)
{
    money = money - 10;
}

void nickels (int money)
{
    money = money - 5;
}

void pennies (int money)
{
    money = money - 1;
}


