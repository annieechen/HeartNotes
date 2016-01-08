/**
 * fifteen.c
 *
 * Annie Chen
 * annie.chen@yale.edu
 * 
 * Computer Science 50
 * Problem Set 3
 *
 * Implements Game of Fifteen (generalized to d x d).
 *
 * Usage: fifteen d
 *
 * whereby the board's dimensions are to be d x d,
 * where d must be in [DIM_MIN,DIM_MAX]
 *
 * 
 */
 
#define _XOPEN_SOURCE 500

#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

// constants
#define DIM_MIN 3
#define DIM_MAX 9

// board
int board[DIM_MAX][DIM_MAX];

// dimensions
int d;

// locations for result of search functions
int row;
int column;
int rowSelect;
int colSelect;
int rowGoal;
int colGoal;

// prototypes
void clear(void);
void greet(void);
void init(void);
void draw(void);
bool move(int tile);
bool won(void);
void search(int goal);

int main(int argc, string argv[])
{
    // ensure proper usage
    if (argc != 2)
    {
        printf("Usage: fifteen d\n");
        return 1;
    }

    // ensure valid dimensions
    d = atoi(argv[1]);
    if (d < DIM_MIN || d > DIM_MAX)
    {
        printf("Board must be between %i x %i and %i x %i, inclusive.\n",
            DIM_MIN, DIM_MIN, DIM_MAX, DIM_MAX);
        return 2;
    }

    // open log
    FILE* file = fopen("log.txt", "w");
    if (file == NULL)
    {
        return 3;
    }

    // greet user with instructions
    greet();

    // initialize the board
    init();

    // accept moves until game is won
    while (true)
    {
        // clear the screen
        clear();

        // draw the current state of the board
        draw();
        // log the current state of the board (for testing)
        for (int i = 0; i < d; i++)
        {
            for (int j = 0; j < d; j++)
            {
                fprintf(file, "%i", board[i][j]);
                if (j < d - 1)
                {
                    fprintf(file, "|");
                }
            }
            fprintf(file, "\n");
        }
        fflush(file);

        // check for win
        if (won())
        {
            printf("ftw!\n");
            break;
        }

        // prompt for move
        printf("Tile to move: ");
        int tile = GetInt();
        
        // quit if user inputs 0 (for testing)
        if (tile == 0)
        {
            break;
        }

        // log move (for testing)
        fprintf(file, "%i\n", tile);
        fflush(file);

        // move if possible, else report illegality
        if (!move(tile))
        {
            printf("\nIllegal move.\n");
            usleep(500000);
        }

        // sleep thread for animation's sake
        usleep(500000);
    }
    
    // close log
    fclose(file);

    // success
    return 0;
}

/**
 * Clears screen using ANSI escape sequences.
 */
void clear(void)
{
    printf("\033[2J");
    printf("\033[%d;%dH", 0, 0);
}

/**
 * Greets player.
 */
void greet(void)
{
    clear();
    printf("WELCOME TO GAME OF FIFTEEN\n");
    usleep(2000000);
}

/**
 * Initializes the game's board with tiles numbered 1 through d*d - 1
 * (i.e., fills 2D array with values but does not actually print them).  
 */
void init(void)
{
    // fills array from left to right, top to bottom
    int counter = d * d - 1;
   
    // i = rows ; j = columns
    for (int i = 0; i < d; i++) 
    {
        for (int j = 0; j < d; j++)
        {
            board[i][j] = counter;
            counter--;
        }
    }
    
    // if d is even, need to swap 2 and 1
    if (d % 2 == 0) 
    {
        board[d - 1][d - 3] = 1;
        board[d - 1][d - 2] = 2;
    }
}

/**
 * Prints the board in its current state.
 */
void draw(void)
{
    // loops through array in rows, printing value at each spot
    for (int i = 0; i < d; i++) 
    {
        for (int j = 0; j < d; j++)
        {
            // prints blank as an underscore
            if (board[i][j] == 0)
            {
                printf(" _ ");
            }
            // prints single digit numbers with a space in front for spacing
            else if (board[i][j] < 10)
            {
                printf(" %i ", board[i][j]);
            }
            else
            {
                printf("%i ", board[i][j]);
            }    
        }
        printf("\n");
    }
}

/**
 * If tile borders empty space, moves tile and returns true, else
 * returns false. 
 */
bool move(int tile)
{
  
    // make sure number of tile is within grid
    if (tile < 1 || tile > (d * d - 1)) 
    {
        return false;
    }
    else 
    {
        // search for coordinates of tile to be moved
        // store the coordiates
        search(tile);
        rowSelect = row;
        colSelect = column;
        
        // search for coordinates of blank tile
        // store the coordinates
        search (0);
        rowGoal = row;
        colGoal = column;
    }
    // makes sure either row or column of tiles to be switched are the same
    if (rowSelect == rowGoal )
    {
        // checks that tiles to be swapped are adjacent
        // if so, swaps their values
        if ((colSelect == (colGoal + 1)) || ((colSelect == (colGoal - 1))))
        {
            board[rowSelect][colSelect] = 0;
            board[rowGoal][colGoal] = tile;
            return true;
        }
        // if not adjacent, move is illegal
        else 
        {
            return false;
        }
    }
    else if (colSelect == colGoal)
    {
        // checks that tiles to be swapped are adjacent
        // if so, swaps their values
        if ((rowSelect == (rowGoal + 1)) || ((rowSelect == (rowGoal - 1))))
        {
            board[rowSelect][colSelect] = 0;
            board[rowGoal][colGoal] = tile;
            return true;
        }
        // if not adjacent, move is illegal
        else 
        {
            return false;
        }
    }  
    // if neither row nor column are the same, move cannot be completed
    else 
    {
        return false;
    }
}

/**
 * Returns true if game is won (i.e., board is in winning configuration), 
 * 
 * determines whether game is won by looping through the array
 * compares each value to correct value
 * if not same, returns false
 * once last value (d*d) has been reached, returns true
 * 
 * 
 */
bool won(void)
{
    int compare = 1;
    for (int i = 0; i < d; i++)
    {
        for (int j = 0; j < d; j++) 
        {
            if (compare == d * d)
            {
                return true;
            }
            if (board[i][j] != compare)
            {
                i = d + 1;
                j = d + 1;
                return false;
            }
            else 
            { 
                compare++;
            }
        }
    }
    return true;
}
/**
 * given an int value, searches through array for that value
 * assumes value is in the array (has been checked earlier in the code)
 * stores the coordinates of row and column
 * exits the loop once value has been found 
 */ 
void search(int goal)
{
    for (int i = 0; i < d; i++)
    {
        for (int j = 0; j < d; j++)            
        {
            if ( board[i][j] == goal) 
            {
                row = i;
                column = j;
                i = d + 1;
                j = d + 1;
            }
        }
    }
}
