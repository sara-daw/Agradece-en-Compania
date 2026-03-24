CREATE TABLE Alumnos (
    IdAlu TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255),
    Usuario CHAR(50),
    PW VARCHAR(255),
    Jesuita VARCHAR(255),
    ImgJesuita VARCHAR(255),
    Info TEXT
);
CREATE TABLE Agradecimientos (
    IdGracias INT AUTO_INCREMENT PRIMARY KEY,
    Mensaje TEXT,
    Emisor TINYINT UNSIGNED,
    Destinatario TINYINT UNSIGNED,

    CONSTRAINT fk_emisor
        FOREIGN KEY (Emisor) REFERENCES Alumnos(IdAlu),

    CONSTRAINT fk_destinatario
        FOREIGN KEY (Destinatario) REFERENCES Alumnos(IdAlu),

    CONSTRAINT chk_emisor_destinatario
        CHECK (Emisor <> Destinatario),

    CONSTRAINT unique_emisor_destinatario
        UNIQUE (Emisor, Destinatario)
);
INSERT INTO Alumnos (Nombre, Usuario, PW, Jesuita, ImgJesuita, Info) VALUES
('Juan Pérez', 'jperez', '1234', 'San Ignacio de Loyola', 'ignacio.jpg',
 'Fundador de la Compañía de Jesús en el siglo XVI. Promovió la educación, la disciplina espiritual y los Ejercicios Espirituales.'),

('María López', 'mlopez', '1234', 'San Francisco Javier', 'javier.jpg',
 'Misionero jesuita y uno de los fundadores de la orden. Evangelizó en Asia, especialmente en India y Japón.'),

('Carlos García', 'cgarcia', '1234', 'San Pedro Claver', 'claver.jpg',
 'Misionero en Colombia que dedicó su vida a ayudar a los esclavos africanos, defendiendo su dignidad y derechos.'),

('Lucía Fernández', 'lfernandez', '1234', 'San Luis Gonzaga', 'luis.jpg',
 'Jesuita italiano conocido por su vida de pureza y servicio. Murió joven atendiendo a enfermos durante una epidemia.'),

('David Martínez', 'dmartinez', '1234', 'San Alonso Rodríguez', 'alonso.jpg',
 'Hermano jesuita que trabajó como portero en Mallorca. Destacó por su humildad y profunda vida espiritual.'),

('Sergio Ruiz', 'sruiz', '1234', 'San Estanislao de Kostka', 'estanislao.jpg',
 'Joven jesuita polaco conocido por su gran vocación y entrega espiritual desde muy temprana edad.'),

('Elena Torres', 'etorres', '1234', 'San José de Anchieta', 'jose.jpg',
 'Misionero jesuita en Brasil, lingüista y educador que ayudó a evangelizar y proteger a los pueblos indígenas.');
