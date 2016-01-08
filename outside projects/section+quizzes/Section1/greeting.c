#include<stdio.h>
#include <string.h>
#include<cs50.h>

int my_strlen(string str)
{
    int length;
    for (length = 0; str [length] != 0; length ++) {};
    return length;
}

int main (int argc, string argv [])
{
    string greeting [] = {" I like %s!", "I love %s!", "%s is my favorite!"};
    if (argc < 2) 
    {
        printf("must supply a name! \n");
        return 1;
    }
    string name = argv [1];

    if (my_strlen(name) != 0 )
    {
        printf (greeting[rand() % 3], name);
        printf("\n?");
    }
}