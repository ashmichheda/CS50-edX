#include<stdio.h>
#include<cs50.h>
#include<string.h>
#include<ctype.h>
int main(void)
{
    string s;
    s=GetString();
    int n=strlen(s);
    int a=0;
    
    while(s[a]==' ')
        a++;
    printf("%c", toupper(s[a]));
    
    for(int i=a+1; i<n; i++)
    {
         while (s[i] == ' ')
        {
            i++;

            // Only print if next char is not a space
            if (i < n && s[i] != ' ')
            {
                printf("%c", toupper(s[i]));
            }
        }   
        
    }
    printf("\n");
      return 0;
}