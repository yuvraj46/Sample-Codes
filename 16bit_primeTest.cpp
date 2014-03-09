#include <string.h>
#include <iostream>
#include <string>
#include <stdlib.h>
#include <math.h>
using namespace std;
int isPrime(int input);int main(int argc, char* argv[])
{
		
	string rawInput;
	while( getline( cin, rawInput, ' ') )
	{
  		int input = atoi( rawInput.c_str() );
		if(input>65535)
			fprintf(stderr, "\n%d is not a 16-bit integer",input);
  		else
		{
			int flag=0;
			for(int i=2;i<=sqrt(input);i++)         
       	  		{
        			if(input%i==0)      
              				flag=1;
        		}
        		if(flag==0)	
				printf("\nyes");
        		else	
				printf("\nno");
		}
		
	}	
	
}
