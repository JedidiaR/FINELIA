
CREATE TABLE 'matiere' (
  'nom' varchar(25),#not null implicite car primary key
  'prof' varchar(25) NOT NULL,
  PRIMARY KEY('nom')
);

CREATE TABLE 'etudiant' (
  'nom' varchar(25),
  'prenom' varchar(25),
  PRIMARY KEY('nom','prenom')
);

CREATE TABLE 'note' (
  'nom' varchar(25),
  'prenom' varchar(25),
  'matiere' varchar(25),
  'note' int(11) NOT NULL,
  'coeff' int(11) NOT NULL,
  FOREIGN KEY ('nom') REFERENCES etudiant('nom'),
  FOREIGN KEY ('prenom') REFERENCES etudiant('prenom'),
  FOREIGN KEY ('matiere') REFERENCES matiere('nom')
);

INSERT INTO 'etudiant' ('nom', 'prenom') VALUES
('Jed', 'Rari'),
('Luc', 'Crespo'),
('Sebastien', 'Delestrade'),
('Duvin', 'Jean');

INSERT INTO 'matiere' ('nom', 'prof') VALUES
('Anglais', 'Sommier'),
('Allemand', 'Dubois'),
('Espagnol', 'Guillermo'),
('Philosophie', 'Ambert'),
('Histoire', 'Menage');