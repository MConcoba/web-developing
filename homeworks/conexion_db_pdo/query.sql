create table libro(
	libro_id int auto_increment primary key,
	titulo varchar(100) not null,
	autor varchar(100) not null,
	editorial varchar(200) not null,
	anio int not null,
	temas varchar(255)
);


INSERT INTO libro (titulo, autor, editorial, anio, temas) VALUES
('Cien Años de Soledad', 'Gabriel García Márquez', 'Sudamericana', 1967, 'Realismo mágico, Familia, Historia'),
('Don Quijote de la Mancha', 'Miguel de Cervantes', 'Francisco de Robles', 1605, 'Novela, Aventuras, Humor'),
('Crimen y Castigo', 'Fiódor Dostoyevski', 'Russky Vestnik', 1866, 'Psicología, Crimen, Moralidad'),
('Orgullo y Prejuicio', 'Jane Austen', 'T. Egerton', 1813, 'Romance, Sociedad, Matrimonio'),
('El Gran Gatsby', 'F. Scott Fitzgerald', 'Scribner', 1925, 'Sueño Americano, Tragedia, Amor'),
('Matar a un Ruiseñor', 'Harper Lee', 'J.B. Lippincott & Co.', 1960, 'Racismo, Justicia, Crecimiento personal'),
('1984', 'George Orwell', 'Secker & Warburg', 1949, 'Distopía, Totalitarismo, Libertad'),
('El Señor de los Anillos', 'J.R.R. Tolkien', 'Allen & Unwin', 1954, 'Fantasía, Aventura, Guerra'),
('Ulises', 'James Joyce', 'Shakespeare and Company', 1922, 'Modernismo, Monólogo interior, Cultura'),
('El Principito', 'Antoine de Saint-Exupéry', 'Reynal & Hitchcock', 1943, 'Fábula, Infancia, Filosofía');


CREATE TABLE calificaciones (
    calificacion_id INT IDENTITY(1,1) PRIMARY KEY,
    nombres VARCHAR(100) NOT NULL,
    materia VARCHAR(50) NOT NULL,
    calificacion DECIMAL(5, 2) NOT NULL,
    fecha DATE NOT NULL
);


INSERT INTO calificaciones (nombres, materia, calificacion, fecha) VALUES
('Juan Pérez', 'Matemáticas', 85.50, '2024-08-01'),
('María García', 'Ciencias', 92.75, '2024-08-02'),
('Carlos López', 'Historia', 78.00, '2024-08-03'),
('Ana Torres', 'Lengua Española', 88.25, '2024-08-04'),
('Luis Hernández', 'Matemáticas', 94.50, '2024-08-05'),
('Sofía Martínez', 'Ciencias', 81.00, '2024-08-06'),
('Miguel Ramírez', 'Historia', 72.25, '2024-08-07'),
('Laura Sánchez', 'Lengua Española', 89.50, '2024-08-08'),
('Pedro Ortiz', 'Matemáticas', 76.75, '2024-08-09'),
('Elena Rodríguez', 'Ciencias', 90.00, '2024-08-10');