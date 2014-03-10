/*
findNthNode that will be printed for preoder traversal

params:
- pointer to the root of a binary tree
- integer n

return:
- pointer to the nth node, inorder traversal


     A
   B   C
 D    E  F
 
*/

Node *find(int *root, int *toFind)
{
    if(*toFind==0 || root!= NULL)
        return(NULL);
    if(root)
    {
        find(root->left,&(*toFind-1));
        find(root->right,&(*toFind-1));
    }
    return(root->value);

}
