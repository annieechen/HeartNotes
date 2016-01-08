#include <arpa/inet.h>
#include <dirent.h>
#include <errno.h>
#include <limits.h>
#include <math.h>
#include <signal.h>
#include <stdbool.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <strings.h>
#include <sys/socket.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <unistd.h>

/*bool parse(const char* line); //, char* path, char* query);
void test (const char* httpversion);

*/int main (void){
    //const char* tester = "method request http";
    //parse(tester);
   // const char* testy = "HTTP/1.1";
//    test(testy);
    //char* word;
   char* i =  strchr("/hello.php?name=annie", '?') ;
   i = i +1;
   //strncpy(w, i +1, strlen(i));
   printf("%s", i);
   printf("%lu", strlen(i));
}



/*
bool parse(const char* line)// char* abs_path, char* query)
{
    char buffer[strlen(line)];
    strcpy(buffer, line);
    const char* space = " ";
    
    char* method = strtok(buffer, space);
    printf ("%s\n", method);
    char* requestTarget = strtok(NULL, space);
    printf ("%s\n", requestTarget);
    char* httpversion = strtok(NULL, space);
    printf ("%s\n", httpversion);
   
    return false;
}
void test (const char* httpversion)
{
    int test = (strcmp(httpversion, "HTTP/1.1"));
 printf( "%i", test);
}
*/