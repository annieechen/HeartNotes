int listlen(List* list) 
{
    int length = NULL;
    Node* current = list -> head;
    while (current != NULL)
    {
        length ++;
        current = current ->next;
    }
    return length;
}

void append (List* list, int el) 
{
    Node* current = list -> head;
    Node* previous = NULL;
    while (current != NULL)
    {
        previous = current;
        current = current -> next;
    }
    Node* newN = malloc(sizeof(*newN));
    newN -> data = el;
    newN -> next = NULL;
    if (previous)
    {
        previous ->next = newN;
    } else 
    { 
        list -> head = newN;
    }
    list ->length ++;
}

void append2 (List* list, int el)
{
    Node* n = list -> tail;
    Node* newN = malloc(sizeof(*n));
    newN = node {el, NULL};
    list -> tail = newN;
    if (n)
    {
        n -> next = newN;
    }
    list -> length ++;
}


types of questions
    translate scratch to C
    convert between number bases
    write simple C programs in "pretty-much c" (atio, strlen)
    recall algorithm runtimes
    explain terminology (eg. Buffer overflows) WHAT IS THIS??!
    interpret error messages from clang/valgrid
    run program by hand (ie. list output)

Binary. ASCII.
    algorithms, (sorting, binary search, linked lists, hash tables) pseudocode. source code. compiling. objects
                                                                                            clang source.c -o source

    code.scratch.statements. booleans expressions. conditions. loops.
    
    variables. functions. arrays. threads
Floating point imprecisions. <--STUDY THIS 

    Linux (navigating directories).C.Compiling. Libraries. Types. Standard Output/Input/Error
    
    Castings.Imprecision. Switches.Scope.Strings.Arrays.Crytography.

    Command-line arguments. Searching. Sorting. Bubble Sort. Selection sort.
    
    Insertion sort. O Omega Theta (both big O and omega). Recursion. Merge Sort.
    
    Stack. Debugging. File I/O. Hexadecimal. Strings. 
Pointers. Pointer Arithmetic. 
    Dynamic ??
    
    Memory allocation.
    
    Heap. Buffer overflow. Linked lists.
Hash tables. Tries. Trees. Stacks. Queues
    
    
        