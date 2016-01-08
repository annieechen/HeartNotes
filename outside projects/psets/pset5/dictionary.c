/**
 * dictionary.c
 *
 * Computer Science 50
 * Problem Set 5
 *
 * Implements a dictionary's functionality.
 */

#include <stdbool.h>
#include <stdlib.h>
#include <string.h>
#include <stdio.h>
#include "dictionary.h"
#include <ctype.h>


// prototype
int hash(char* string);

/**
 * defines struct node 
 */
 
typedef struct node
{
    char word[LENGTH + 1];
    struct node* next;
} node;

// allocates hashtable node pointer array
node* hashtable[HASHTABLE_SIZE];
// global variable to count size of dictionary
int numWords = 0;
 
/**
 * Returns true if word is in dictionary else false.
 */
bool check(const char* word)
{
    // array to load word into, to convert from const char* to lowercase char*
    char buffer[LENGTH + 1];
    for (int i = 0, n = strlen(word); i <= n; i++) 
    {
        buffer[i] = tolower(word[i]);
    }
    
    // index of word to be checked
    int index = hash(buffer);
    
    // check if there is a word at that bucket
    if (hashtable[index] == NULL)
    {
        return false;
    }
    
    // check to see if in first bucket
    if ((strcmp (hashtable[index]->word, buffer) == 0))
    {
        return true;
    } 
    // travel down linked list
    else 
    {
        
        node* cursor = hashtable[index];
        while (cursor != NULL)
        {
            if ((strcmp (cursor->word, buffer)) == 0)
            {
                return true;
            }
            else 
            {
                cursor = cursor->next;
            }
        }
        return false;
    }
}

/**
 * Loads dictionary into memory.  Returns true if successful else false.
 */
bool load(const char* dictionary)
{
    // open dictionary file
    FILE* file = fopen(dictionary, "r");
    
    // if file cannot be opened, end and return false
    if (file == NULL)
    {
        return false;
    }
    
    for(int i = 0; i < HASHTABLE_SIZE; i++)
    {
        hashtable[i] = NULL;
    }
    // scan dictionary and enter words into hash table
    char wordbuffer [LENGTH + 1];
    while(fscanf(file, "%s\n", wordbuffer) != EOF)
    {
        node* new_node = malloc(sizeof(node));
        strcpy(new_node->word, wordbuffer);
        numWords++;
        // find the index of the scanned word
        int index = hash(new_node->word);
       // insert word as node of linked list
       // if hashtable bucket is empty
        if (hashtable[index] == NULL)
        {
            hashtable[index] = new_node;
            hashtable[index]->next = NULL;
            
       } 
       else
        {
            new_node->next = hashtable[index];
            hashtable[index] = new_node;
       }
   }
    fclose(file);
    return true;
}

/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    return numWords;
}

/**
 * Unloads dictionary from memory.  Returns true if successful else false.
 */
bool unload(void)
{
    for (int i = 0; i < HASHTABLE_SIZE + 1; i++)
    {
        // don't have to free hashtable, because it is a static global variable
        node* cursor = hashtable[i];
        while (cursor != NULL)
        {
            node* deletor = cursor;
            cursor = cursor->next;
            free(deletor);
        }
   }
    return true;
}

/**
 * takes in a string, returns an int key according to the hash function found @:
 * https://www.reddit.com/r/cs50/comments/1x6vc8/pset6_trie_vs_hashtable/cf9nlkn
 */

int hash(char* string)
{
    unsigned int index = 0;
    for (int i = 0, n = strlen(string); i < n; i++)
    {
        index = (index << 2 ) ^ string[i];
    }
    return index % HASHTABLE_SIZE;
}