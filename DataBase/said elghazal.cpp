#include <iostream>
#include <stdlib.h>
#include <windows.h>

using namespace std;

class Game
{
char jeux[4][4];
public:
Game()
{
    for(int i=0;i<4;i++)
    {
        for(int j=0;j<4;j++)
        {
            jeux[i][j]='_';
        }
    }
}


void print_Game()
{

    for(int i=0;i<4;i++)
    {
        for(int j=0;j<4;j++)
        {
            cout<<jeux[i][j]<<'|';
        }
    cout<<endl;
    }
cout<<endl;
}
int set_P(char choix)
{
while(1)
{
int ligne,colone;
cout<<"donez la ligne (DE 0 A 3):"<<endl;
cin>>ligne;
cout<<"donnez la colone(DE 0 A 3)"<<endl;
cin>>colone;
if(jeux[ligne][colone]=='_')
{
jeux[ligne][colone]=choix;
break;

}
else
{
cout<<"La position est prise"<<endl;

}
}
}
char get_P()
{
for(int i=0;i<4;i++)
{
    for(int j=0;j<4;j++)
    {
        return jeux[i][j];
    }
    }

}
int checkligne(char choix)
{


int count;
for(int i=0;i<4;i++)
{
    count=0;
    for(int j=0;j<4;j++)
    {
        if(jeux[i][j]==choix)
        {
            count++;
        }
        if(count==4)
        {

            return 1;
        }
    }

}
return 0;
}
int checkcolone(char choix)
{
int count;
for(int i=0;i<4;i++)
{
    count=0;
    for(int j=0;j<4;j++)
    {
        if(jeux[j][i]==choix)
        {
            count++;
        }
        if(count==4)
        {

            return 1;
        }
    }

}
return 0;
}
int verifier_la_diagonale_principale(char choix)
{
int count=0;
for(int i=0;i<4;i++)
{
    if (jeux[i][i]==choix)
    {
        count++;
    }

    }
if(count==4)
{

  return 1;
}


return 0;
}
int verifier_autre_Diagonal(char choix)
{
int count=0;
for(int i=0;i<4;i++)
{

    for(int j=0;j<4;j++)
    {

        if((i+j)%3==0 && i!=j)
        {
         if (jeux[i][j]==choix)
        {
           count++;
        }
        }


    }
}

if(count==4)
{

    return 1;
}
    else
    {
        return 0;
    }
}
int check_print()
{
for(int i=0;i<4;i++)
{
    for(int j=0;j<4;j++)
    {
        if(jeux[i][j]=='_')
        {
            return 1;
            break;
        }

    }
 }
return 0;
}

};
class Joueur
{
string Nom;
char choix;
public:
void setNom(string NomIn)
{
 Nom=NomIn;
}
void setChoix(char choixIn)
{
    choix=choixIn;
}
char getChoix()
{
    return choix;
    cout<<endl<<endl;
}

string getNom()
{
    return Nom;
    cout<<endl<<endl;
}
};
int main()
{
    cout<<"SAID_EL_GHAZAL";
    system("color 1");
                        cout<<"\t\t\t\t\t BIENVENU SUR TIC_TAC_TEO JEUX:\n";
char choix1,choix2,choix3;
string Nom1,Nom2,Nom3;
Game b1;
Joueur p1,p2,p3;
     {
cout<<"Joueur 1,entre votre nom :"<<endl<<endl;
cin>>Nom1;
cout<<"Joueur 2,entre votre nom :"<<endl<<endl;
cin>>Nom2;
cout<<"Joueur 3,entre votre nom :"<<endl<<endl;
cin>>Nom3;

p1.setNom(Nom1);
p2.setNom(Nom2);
p3.setNom(Nom3);
system("cls");
     }
     {
cout<<endl<<endl<<Nom1<<",Entrez une lettre a utiliser"<<endl<<endl;
cin>>choix1;
cout<<endl<<endl<<Nom2<<", Entrez une lettre a utiliser"<<endl<<endl;
cin>>choix2;
cout<<endl<<endl<<Nom3<<",Entrez une lettre a utiliser"<<endl<<endl;
cin>>choix3;
p1.setChoix(choix1);
p2.setChoix(choix2);
p3.setChoix(choix3);
system("cls");
b1.print_Game();

     }
while(1)
{
cout<<endl<<endl<<"votre tour,"<<Nom1<<endl<<endl;
b1.set_P(choix1);
b1.get_P();
system("cls");
b1.print_Game();
if(b1.checkligne(choix1)==1 || b1.checkcolone(choix1)==1||
b1.verifier_la_diagonale_principale(choix1)==1 || b1.verifier_autre_Diagonal(choix1)==1)

{
    cout<<endl<<endl<<"bravoooo"<<"\t"<<Nom1<<"\t"<<"Tu as gagne!"<<endl;
    break;

}
cout<<endl<<endl<<"votre tour,"<<Nom2<<endl<<endl;
b1.set_P(choix2);
b1.get_P();
system("cls");
b1.print_Game();
if(b1.checkligne(choix2)==1 || b1.checkcolone(choix2)==1||
b1.verifier_la_diagonale_principale(choix2)==1 || b1.verifier_autre_Diagonal(choix2)==1)

{
    cout<<endl<<endl<<"Bravoooo"<<"\t"<<Nom2<<"\t"<<"Tu as gagne!"<<endl;
    break;
}

cout<<endl<<endl<<"Votre tour,"<<Nom3<<endl<<endl;
b1.set_P(choix3);
b1.get_P();
system("cls");
b1.print_Game();
if(b1.checkligne(choix3)==1 || b1.checkcolone(choix3)==1||
b1.verifier_la_diagonale_principale(choix3)==1 || b1.verifier_autre_Diagonal(choix3)==1)
{
    cout<<endl<<endl<<"Bravoooo "<<Nom3<<" Tu as gagne!"<<endl;
    break;
}
if(b1.check_print()==0)
{
    cout<<endl<<endl<<"Le match est a egalite!"<<endl<<endl<<endl;
    break;
}


}



}
