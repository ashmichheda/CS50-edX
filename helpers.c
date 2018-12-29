/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>

#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
    // TODO: implement a searching algorithm
    int l=0,h=n-1,m;
    if(value>0)
    {
    while(l<=h)
    {
        m=(l+h)/2;
        if(value == values[m])
        {
            return true;
        }
        if(value < values[m])
        {
            h = m-1;
        }
        else
        l=m+1;
    }
    }
    /*if(value>0)
    {
        for(int i=0; i<n; i++)
        {
            if(value==values[i])
            {
                return true;
            }
        }
       
    }
    else
    return false; */
    return false;
}

/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{
    // TODO: implement an O(n^2) sorting algorithm
    int i,j,t;
    for(i=0; i<n-1; i++)
    {
        for(j=0; j<n-1; j++)
        {
            if(values[j]>values[j+1])
            {
                t=values[j];
                values[j]=values[j+1];
                values[j+1]=t;
            }
        }
    }
    return;
}