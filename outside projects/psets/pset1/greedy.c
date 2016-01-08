/**
 * greedy.c
 * 
 * Annie Chen
 * annie.chen@yale.edu
 * 
 * calculates minimum number of coins needed to give exact change for user imputted amount
 */
 
#include <stdio.h>
#include <cs50.h>
#include <math.h>


int main(void)
{

    float money;
    int moneyLeft;
    int numCoins = 0;
    int quarter = 25;
    int dime = 10;
    int nickel = 5;
    int penny = 1;
  
   
    do 
    {
      // prompt user to enter change
        printf("How much money (in dollars) do you have to give back?");
   
      // stores user imput as variable m
        money = GetFloat();
    }
     // must be positive number
    while (money < 0);
  
  // converts user input into cents
    moneyLeft = round(money * 100);
    
  // creates array of coin values to be used in loop     
    int coinType [4] = { quarter, dime, nickel, penny}; 
    
  // uses loop to subtract max # of each type of coin in sequence
  //increases numCoin each time
    for (int i = 0; i < 4; i++)
    {
        while (moneyLeft >= coinType[i])
        {
            moneyLeft = moneyLeft - coinType[i];
            numCoins = numCoins + 1;
        }
    }
   // prints number of coins used
    printf("%i\n", numCoins);
}