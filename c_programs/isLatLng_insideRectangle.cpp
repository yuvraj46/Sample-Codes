#include "stdafx.h"
#include "conio.h"
#include "math.h"
#include "minmax.h"
class LatLngBounds {
	public:
		float Latitude;
		float Longitude;
	void set(float Lat, float Lng )
	{
		this->Latitude = Lat;
		this->Longitude = Lng;
	}
	void Clamp()
	{
		if(this->Latitude > 90.0 || this->Latitude < -90.0)
			this->Latitude = min(max(this->Latitude,-90.0), 90.0);
	}
	void Wrap()
	{
		if(this->Longitude > 180.0 || this->Longitude < -180.0)
		{
			this->Longitude = fmod(this->Longitude + 180.0,360.0);
			if (this->Longitude < 0)
				this->Longitude += 360.0;
			this->Longitude = this->Longitude  - 180.0;
		}
	}
};
 
int _tmain(int argc, _TCHAR* argv[])
{
	LatLngBounds sw,ne,find;
	float Lat,Lng;
	printf("\nEnter SouthWest Latitude and Longitude of the rectangle: ");
	scanf_s("%f %f",&Lat,&Lng);
	sw.set(Lat,Lng);
	
	CHECK:
		printf("\nEnter NorthEast Latitude and Longitude of the rectangle: ");
		scanf_s("%f %f",&Lat,&Lng);
		ne.set(Lat, Lng);

	sw.Clamp();
	ne.Clamp();
	if(sw.Latitude > ne.Latitude || sw.Longitude > ne.Longitude)
	{
		printf("\nThe value of NorthEast Latitude must be greater or equal to the SouthWest Latitude \nand the value of NorthEast Longitude must be greater or equal to the SouthWest Longitude \nPlease Enter again:");
		goto CHECK;
	}

	sw.Wrap();
	ne.Wrap();

	printf("\nEnter Latitude and Longitude of point to be found: ");
	scanf_s("%f %f",&Lat, &Lng);
	find.set(Lat, Lng);
	find.Clamp();
	find.Wrap();

	bool isPresent = false;
	if(sw.Longitude < 0 || ne.Longitude < 0 )
	{
		if(find.Latitude > sw.Latitude && find.Latitude < ne.Latitude && find.Longitude < sw.Longitude && find.Longitude > ne.Longitude )
			isPresent = true;
	}
	else
		if(find.Latitude > sw.Latitude && find.Latitude < ne.Latitude && find.Longitude > sw.Longitude && find.Longitude < ne.Longitude )
			isPresent = true;

	if(isPresent?printf("\nPoint lies inside the rectangle"):printf("Point lies outside the rectangle"));
	 _getch();
	 return 0;	 
}