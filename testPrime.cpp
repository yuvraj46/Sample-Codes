#include <string.h>
#include <iostream>
#include <string>
#include <cstdlib>
#include <math.h>
using namespace std;
int isPrime(int input);int main(int argc, char* argv[])
{
	int input,flag=0,status,temp;
	printf("Please enter a number: ");
	status = scanf("%d", &input);
	
	while(status!=1 || input< 0){
		while((temp=getchar()) != EOF && temp != '\n' );
		printf("Invalid input... please enter a number: ");
		status = scanf("%d", &input);
	}
	for(int i=2;i<=sqrt(input);i++)         
       	{
        	if(input%i==0)      
              		flag=1;
        }
        if(flag ==0)	
		printf("\nyes\n");
        else	
		printf("\nno\n");

}

