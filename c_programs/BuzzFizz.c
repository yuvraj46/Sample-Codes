
int fibonacci(int n)
{
    if ( n == 0 )
          return 0;
    else if ( n == 1 )
          return 1;
    return fibonacci(n-1) + fibonacci(n-2);
}

void BuzzFizz (int input)
{
    int i=0,j;
      
    int flag=0,value_to_print=1;
    int result = fibonacci(input);
    
    
    if((result % 3) == 0)
    {
        value_to_print =  value_to_print * 3;
        printf("\nBuzz");
    }
    
    if((result % 5) == 0)
    {
        value_to_print = value_to_print * 5;
        printf("\nFizz");
    }
    
    if(value_to_print == 15)
    {
        printf("\nFizzBuzz");
    }

    for(j=2; j<=result/2; ++j)
    {
        if(result%j==0)
        {
            flag=1;
            break;
        }
    }
    if(flag == 0)
    {
        printf("\nBuzzFizz");
    }
    
    if(flag==1 && value_to_print == 1)
    {
        printf("\nvalue : %d\n",fibonacci(input));
    }
}
