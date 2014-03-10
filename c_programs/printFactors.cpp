// Write a code to print PrimeFactors of an integer

//#include "stdafx.h"
#include <stdlib.h>  
#include <stdio.h>
#include <cstdlib>
#include <iostream>
void printFactors(int , int,int []);
int main(int argc, char* argv[])
{
	int initRef[1];
	initRef[0]= 0;
	int	input = atoi((char *)argv[1]);
	if (argc < 2)
	printf("Please run the program by passing correct parameters\n");

	input = strtol(argv[1], NULL, 10);
	if(input<=0)
		printf("Please enter positive number\n");	
	else
	{
		printf("%d * 1\n",input);
		printFactors(input,input,initRef);
	}
	//_gettch();
	return 0;
}

void printFactors(int input, int nextFact, int myRef[])
{
	int temp = nextFact;

	for (int i = input - 1; i >= 2; i--) 
	{
		if (input % i == 0)
 		{ 	
			if (temp > i)
				temp = i;
			if ( (i <= nextFact) && (input /i <= nextFact) && (input /i <= i)) 
			{	
				if(myRef[0]==0)
					printf("%d * %d\n", i, (input /i));
				else
				{
					for(int k=0;myRef[k]!=0;k++)
					{
						if(myRef[k]=='*')
							printf("%c ",myRef[k]);
						else
							printf("%d ",myRef[k]);	
					}

					printf("%d * %d\n", i, (input /i));
				}
				temp = input / i; 
			}
			if (i <= nextFact) 
			{
				int p[4098];
				int k=0;
				for( k=0; myRef[k]!=0;k++)
					p[k]=myRef[k];
				p[k]= i;
				p[k+1]='*';
				p[k+2]=0;
	
				printFactors(input / i , temp,p);
			}
		}
	}
}
