#include<cs50.h>
#include<stdio.h>
int main(void)
{
    int min;
    printf("minutes: ");
    min=GetInt();
    int bottles=min*12;
    printf("bottles: %i\n",bottles);
    return 0;
}