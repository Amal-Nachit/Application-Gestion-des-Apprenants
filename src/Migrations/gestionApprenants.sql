#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: aga_role_user
#------------------------------------------------------------

CREATE TABLE aga_role_user(
        IdRoleUser Int  Auto_increment  NOT NULL ,
        Nom        Varchar (55) NOT NULL
	,CONSTRAINT aga_role_user_PK PRIMARY KEY (IdRoleUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: aga_user
#------------------------------------------------------------

CREATE TABLE aga_user(
        IdUser      Int  Auto_increment  NOT NULL ,
        Nom         Varchar (50) NOT NULL ,
        Prenom      Varchar (50) NOT NULL ,
        Password    Varchar (255) NOT NULL ,
        CompteActif Bool NOT NULL ,
        Email       Varchar (50) NOT NULL ,
        IdRoleUser  Int NOT NULL
	,CONSTRAINT aga_user_AK UNIQUE (Email)
	,CONSTRAINT aga_user_PK PRIMARY KEY (IdUser)

	,CONSTRAINT aga_user_aga_role_user_FK FOREIGN KEY (IdRoleUser) REFERENCES aga_role_user(IdRoleUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: aga_promo
#------------------------------------------------------------

CREATE TABLE aga_promo(
        IdPromo  Int  Auto_increment  NOT NULL ,
        Nom      Varchar (55) NOT NULL ,
        Debut    Date NOT NULL ,
        Fin      Date NOT NULL ,
        NbPlaces Int NOT NULL
	,CONSTRAINT aga_promo_PK PRIMARY KEY (IdPromo)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: aga_cours
#------------------------------------------------------------

CREATE TABLE aga_cours(
        IdCours Int  Auto_increment  NOT NULL ,
        Nom     Varchar (55) NOT NULL ,
        Debut   Datetime NOT NULL ,
        Fin     Datetime NOT NULL ,
        Code    Int NOT NULL ,
        IdPromo Int NOT NULL
	,CONSTRAINT aga_cours_PK PRIMARY KEY (IdCours)

	,CONSTRAINT aga_cours_aga_promo_FK FOREIGN KEY (IdPromo) REFERENCES aga_promo(IdPromo)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: aga_relationUserCours
#------------------------------------------------------------

CREATE TABLE aga_relationUserCours(
        IdCours Int NOT NULL ,
        IdUser  Int NOT NULL ,
        Absence Bool NOT NULL ,
        retard  Bool NOT NULL
	,CONSTRAINT aga_relationUserCours_PK PRIMARY KEY (IdCours,IdUser)

	,CONSTRAINT aga_relationUserCours_aga_cours_FK FOREIGN KEY (IdCours) REFERENCES aga_cours(IdCours)
	,CONSTRAINT aga_relationUserCours_aga_user0_FK FOREIGN KEY (IdUser) REFERENCES aga_user(IdUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: aga_relationUserPromo
#------------------------------------------------------------

CREATE TABLE aga_relationUserPromo(
        IdPromo Int NOT NULL ,
        IdUser  Int NOT NULL
	,CONSTRAINT aga_relationUserPromo_PK PRIMARY KEY (IdPromo,IdUser)

	,CONSTRAINT aga_relationUserPromo_aga_promo_FK FOREIGN KEY (IdPromo) REFERENCES aga_promo(IdPromo)
	,CONSTRAINT aga_relationUserPromo_aga_user0_FK FOREIGN KEY (IdUser) REFERENCES aga_user(IdUser)
)ENGINE=InnoDB;

