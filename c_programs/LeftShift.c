#include <stdio.h>

int main(void)
{
	int leftShift=2;
	int array[4][10]={1,2,3,4,5,6,7,8,9,0,
                	'q','w','e','r','t','y','u','i','o','p',
                	'a','s','d','f','g','h','j','k','l',';',
                	'z','x','c','v','b','n','m',',','.','/'};
    int i,j;
    while(leftShift!=0)
	{
		int temp=array[0][0];
	    j=0;
		while(j<4)
		{
				for ( i = 0; i < 10; i++)
				{
					if(i!=9)
	             		array[j][i]=array[j][i+1];
	              	else
	              		array[j][i]=array[j+1][0];
	
				}
	            j++;
			}
			
			array[3][9]=temp;
			leftShift--;
		
	}

    j=0;
		while(j<4)
		{
			for ( i = 0; i < 10; i++)
			{
                if(array[j][i]<10)
				    printf("%d ",array[j][i]);
                else
                    printf("%c ",array[j][i]);
              

			}
            printf("\n");
            j++;
		}
    
	return 0;
}
