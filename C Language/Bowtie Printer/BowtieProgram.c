/*
June 28 2012

7:02 PM

Bowtie program made by Joseph Niel Tuazon *FINISHED AT LAST :D* 

*/

#include<stdio.h>

int a,b,c,d,e=0;

main() {

    printf("Input a value: ");
    scanf("%d",&a);

/*  Code for bowtie without any space between each asterisk  */	

    for(b=a;b>0;b--){	
	    for(c=b-1;c>0;c--){
			
		    printf(" ");
		}
		e++;
	    for(d=b-e;d<b;d++){		
		    printf("*");	
		}	
	    printf("\n");
	}

	for(b=a+1;b>0;b--){	
		for(e=0;e!=a;e++){
			printf(" ");
		}
		for(c=b-1;c>0;c--){	
			printf("*");		
		}
		printf("\n");
	}

/*  Code for bowtie with a space between each asterisk

	
	for(b=a;b>0;b--){
		for(c=b-1;c>0;c--){
			printf("  ");		
		}
		e++;	
		for(d=b-e;d<b;d++){		
			printf("* ");
		}
		printf("\n");
	}

	for(b=a+1;b>0;b--){
		for(e=0;e!=a;e++){
			printf("  ");
		}
		for(c=b-1;c>0;c--){			
			printf("* ");	
		}		
		printf("\n");
	}
*/

}
		

