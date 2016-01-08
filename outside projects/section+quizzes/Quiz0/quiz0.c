

#include <stdio.h>
int main(void)
{
  
        printf("%ld bytes per pointer\n", sizeof(void *));
    
}
/*
    student student_1;
    student* ptr = &student_1;
    
    //equivalent
    ptr->name = "Rob";
    (*ptr).name = "Rob";
}

typedef struct node
{
    int n;
    struct node* next;
} node;


bool search(int n, node* list)
{
    // points at current node
    node* ptr = list;
    
    // traverse the list until the end
    while (ptr != NULL)
    {
        // check if we found value
        if (ptr->n == n)
         {
        return true;
         }
        // move on to next element
        ptr = ptr->next;
    }
    return false;
}



bool insert(int n)
{
    // create new node
    node* new = malloc(sizeof(node));
    // check for NULL
    if (new == NULL)
    {
        return false;
    }
    // initialize new node
    new->n = n;
    new->next = NULL;
    
    // insert new node at head
    new->next = head;
    head = new;
    return true;
}

int strlen(char* s)
{
 int n = 0;
 while (s[n] != '\0')
 {
    n++;
 }
 return n;
}

int atoi(char* s)
{
     if (s == NULL)
    {
        return 0;
    }
    int value = 0;
    for (int i = 0, n = strlen(s); i < n; i++)
    {
        if (s[i] < '0' || s[i] > '9')
        {
         return 0;
        }
         value *= 10;
        value += s[i] - '0';
    }
    return value;
}


// binary tree
typedef struct node
{
    int n;
    struct node* left;
    struct node* right;
}
node;

//search for binary tree
bool search(int n, node* tree)
{
    if (tree == NULL)
    {
        return false;
    }
    else if (n < tree->n)
    {
        return search(n, tree->left);
    }
    else if (n > tree->n)
    {
        return search(n, tree->right);
    }
    else
    {
        return true;
    }
}
*/
