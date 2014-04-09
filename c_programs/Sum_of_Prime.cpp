#include <stdio.h>
#include <math.h>
int isPrime(int n);
int main()
{
    int sum=0,j;
	int input;
	printf("Enter a number to find sum of all prime numbers less than input: ");
    scanf( "%d", &input);
	for(j=1;j<=input;j++)
	{
		sum+=isPrime(j);
	}
	printf("%d",sum);
  return 0;
}
int isPrime(int n)
{
	int i, flag=0;
 
	  for(i=2;i<=sqrt(n);++i)
	  {
	      if(n%i==0)
	      {
	          flag=1;
	          break;
	      }
	  }
	  if (flag==0)
      {
          //printf("%d\n",n);
	      return n;
      }
	  else 
	  	return 0;
}
