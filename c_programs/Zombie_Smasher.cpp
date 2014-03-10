#include "stdafx.h"
#include <cmath>
#include <cstdio>
#include <cstdlib>
#include <vector>
using namespace std;
int Z, Xi[101], Yi[101], Mi[101];
int cells[2001][2001];

int smash(int z_number, int current_time) {
	int count = cells[z_number][current_time - Mi[z_number]];
	if (count != -1) 
		return count;
	count = 0;
	for (int i = 0; i < Z; i++)
		if (i != z_number)
		{
			int time_to_travel = max(abs(Xi[i]-Xi[z_number]), abs(Yi[i]-Yi[z_number]))*100;
			int travel_and_kill= time_to_travel;
			if (z_number != Z) 
				travel_and_kill = max(time_to_travel, 750);
			if (current_time+travel_and_kill <= Mi[i]+1000)
				count = max(count, 1 + smash(i, max(Mi[i], current_time+travel_and_kill)));
		}
	return count;
}
int _tmain(int argc, _TCHAR* argv[])
{
	int T, prob = 1;
	int output[100]={-1};
	scanf_s("%d",&T);
	for(int i=0; i<T;i++) {
		scanf_s("%d",&Z);
		for (int i = 0; i < Z; i++) 
			scanf_s("%d %d %d",&Xi[i],&Yi[i],&Mi[i]);
		Xi[Z] = Yi[Z] = Mi[Z] = 0;
		for(int j=0; j<2001;j++)
			for(int k=0;k<2001;k++)
				cells[j][k]=-1;
		int count = smash(Z, 0);
		output[prob++]= count;
	}
	for(int i=1;i<=T;i++)
		printf("\nCase #%d : %d",i,output[i]);
	_gettch();
	return 0;
}
