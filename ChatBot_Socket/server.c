#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/types.h> 
#include <sys/socket.h>
#include <netinet/in.h>


int main(int argc, char *argv[])
{
     int sockfd, newsockfd, port_no;
     socklen_t clilen;
     char buffer[256];
     struct sockaddr_in serv_addr, cli_addr;
     int n;
     if (argc < 2) {
         fprintf(stderr,"ERROR, Hey you not provided less number of argument\n");
         exit(1);
     }
     sockfd = socket(AF_INET, SOCK_STREAM, 0);
     if (sockfd < 0) 
     {
        perror("ERROR In openig of socket");
        exit(-1);
     }
     bzero((char *) &serv_addr, sizeof(serv_addr));
     
     port_no = atoi(argv[1]);
     serv_addr.sin_family = AF_INET;
     serv_addr.sin_addr.s_addr = INADDR_ANY;
     serv_addr.sin_port = htons(port_no);
     
    if (bind(sockfd, (struct sockaddr *) &serv_addr,sizeof(serv_addr)) < 0) 
    {
        perror("ERROR on binding");
        exit(-1);
    }
    
    listen(sockfd,5);
    clilen = sizeof(cli_addr);
    newsockfd = accept(sockfd,(struct sockaddr *) &cli_addr,&clilen);
    if (newsockfd < 0)
    { 
          perror("ERROR on accept");
          exit(-1);
    }
    while(1)
    {
           bzero(buffer,256);
           n = read(newsockfd,buffer,255);
           if (n < 0) 
           {
               perror("ERROR reading from socket");
               exit(-1);
           }
           printf("-------------------------------------\n");
           printf("Client-msg: %s",buffer);
           printf("-------------------------------------\n");
           bzero(buffer,256);
           fgets(buffer,255,stdin);
           n = write(newsockfd,buffer,strlen(buffer));
           if (n < 0) 
           {
               perror("You not written anything.");
               exit(-1);
           }
           int i=strncmp("Bye" , buffer, 3);
           if(i == 0)
               break;
     }
     close(newsockfd);
     close(sockfd);
     return 0; 
}
