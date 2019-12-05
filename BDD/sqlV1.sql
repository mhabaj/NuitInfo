#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        idUser   Int  Auto_increment  NOT NULL ,
        userName Varchar (15) NOT NULL ,
        password Varchar (255) NOT NULL ,
        status   TinyINT NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (idUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Stream
#------------------------------------------------------------

CREATE TABLE Stream(
        idStream    Int  Auto_increment  NOT NULL ,
        streamVideo Varchar (255) NOT NULL ,
        streamChat  Varchar (255) NOT NULL
	,CONSTRAINT Stream_PK PRIMARY KEY (idStream)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: send
#------------------------------------------------------------

CREATE TABLE send(
        idStream      Int NOT NULL ,
        idUser        Int NOT NULL ,
        MessageDate   Datetime NOT NULL ,
        messageStatus Bool NOT NULL ,
        message       Varchar (255) NOT NULL
	,CONSTRAINT send_PK PRIMARY KEY (idStream,idUser)

	,CONSTRAINT send_Stream_FK FOREIGN KEY (idStream) REFERENCES Stream(idStream)
	,CONSTRAINT send_User0_FK FOREIGN KEY (idUser) REFERENCES User(idUser)
)ENGINE=InnoDB;

