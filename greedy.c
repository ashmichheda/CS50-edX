#include<math.h>
#include<cs50.h>
#include<stdio.h>
int main(void)
{
    int quarters=25;
    int dimes=10;
    int nickels=5;
    int pennies=1;
    int coins=0;
    float h;
    do
    {
    printf("O hai! How much change is owed?\n");
    h=GetFloat();
    } while(h<0);
     //h=h*100;
    int m=(int)round(h*100);
   //printf("%d\n",m);
    
    //whether money owed is within quarters
    while(quarters<=m)
    {
        m=m-quarters;
        coins++;
    }
 
    //whether money owed is within dimes
    while(dimes<=m)
    {
        m=m-dimes;
        coins++;
    }
    
    //whether money owed is within nickels
    while(nickels<=m)
    {
        m=m-nickels;
        coins++;
    }
    
    //whether money owed is within pennies
    while(pennies<=m)
    {
        m=m-pennies;
        coins++;
    }
    
    printf("%d\n",coins);
    
    return 0;
}