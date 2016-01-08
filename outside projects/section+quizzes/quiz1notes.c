unsigned int size(void)
{
    unsigned int size = 0;
    for (int i = 0; i < 26; i++)
    {
        node* ptr = table[i];
        while (ptr != NULL)
        {
        size++;
        ptr = ptr->next;
        }
    }
    return size;
}