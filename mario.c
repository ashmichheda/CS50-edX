#include<cs50.h>
#include<stdio.h>
int main(void)
{
    int h;
    do
    {
    printf("height: ");
    h=GetInt();
    } while(h<0 || h>23);
    
        int space=h-1;
        int count=1;
        int temp;
        char ch='#';
        for(int i=1; i<=h; i++)
        {
            count=count+1;
            temp=count;
            for(int j=space; j>0; j--)
            {
                printf(" ");
            }
            while(temp!=0)
            {
                printf("%c",ch);
                temp--;
            }
            printf("\n");
            space--;
            
        }
        
    return 0;
}
