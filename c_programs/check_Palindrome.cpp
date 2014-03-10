bool isPalindrome(string inputString)
{
   bool palindrome=TRUE;
   int length = strlen(inputString);
   length=length/2;
   if (length>0)
   {
     for(int i=0;i<(length);i++)
     {
      if(inputString[i]!= inputString[length-1-i]) 
        palindrome=FALSE;
     } 
   }
   return palindrome;

}
