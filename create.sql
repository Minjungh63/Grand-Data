USE TEAM11;

CREATE TABLE Genre(
    genre_id INT AUTO_INCREMENT PRIMARY KEY,
    genre_name VARCHAR(20) NOT NULL
);

CREATE TABLE Category(
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(20) NOT NULL
);

CREATE TABLE Director(
    director_id INT AUTO_INCREMENT PRIMARY KEY,
    director_name VARCHAR(50) NOT NULL
);

CREATE TABLE Distributor(
    distributor_id INT AUTO_INCREMENT PRIMARY KEY,
    distributor_name VARCHAR(40) NOT NULL
);

CREATE TABLE Festival(
    festival_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    festival_name VARCHAR(30) NOT NULL,
    continent VARCHAR(20),
    country VARCHAR(20),
    city VARCHAR(30),
    FOREIGN KEY (category_id) REFERENCES Category(category_id) ON DELETE SET NULL
);

CREATE TABLE Theater(
    theater_id INT AUTO_INCREMENT PRIMARY KEY,
    theater_name VARCHAR(20) NOT NULL,
    branch VARCHAR(20) NOT NULL,
    hall_num INT,
    seat_num INT
);

CREATE TABLE Theater_Address(
    theater_id INT PRIMARY KEY,
    city VARCHAR(30) NOT NULL,
    district VARCHAR(30) NOT NULL,
    FOREIGN KEY (theater_id) REFERENCES Theater(theater_id) ON DELETE CASCADE
);

CREATE TABLE Movie(
    movie_id INT AUTO_INCREMENT PRIMARY KEY,
    genre_id INT,
    category_id INT,
    distributor_id INT,
    director_id INT,
    movie_name VARCHAR(50) NOT NULL,
    country VARCHAR(20),
    released_date DATE NOT NULL,
    film_rating VARCHAR(20),
    FOREIGN KEY (genre_id) REFERENCES Genre(genre_id) ON DELETE SET NULL,
    FOREIGN KEY (director_id) REFERENCES Director(director_id) ON DELETE SET NULL,
    FOREIGN KEY (category_id) REFERENCES Category(category_id) ON DELETE SET NULL,
    FOREIGN KEY (distributor_id) REFERENCES Distributor(distributor_id) ON DELETE SET NULL
);

CREATE TABLE Screening_Info(
    movie_id INT PRIMARY KEY,
    screen_num INT,
    FOREIGN KEY (movie_id) REFERENCES Movie(movie_id) ON DELETE CASCADE
);

CREATE TABLE Sales(
    movie_id INT PRIMARY KEY,
    sales_total BIGINT(15) NOT NULL,
    sales_seoul BIGINT(15) NOT NULL,
    FOREIGN KEY (movie_id) REFERENCES Movie(movie_id) ON DELETE CASCADE
);

CREATE TABLE Spectator(
    movie_id INT PRIMARY KEY,
    spectator_total INT NOT NULL,
    spectator_seoul INT NOT NULL,
    FOREIGN KEY (movie_id) REFERENCES Movie(movie_id) ON DELETE CASCADE
);

CREATE TABLE Award(
    award_id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    festival_id INT NOT NULL,
    award_year INT NOT NULL,
    FOREIGN KEY (movie_id) REFERENCES Movie(movie_id) ON DELETE CASCADE,
    FOREIGN KEY (festival_id) REFERENCES Festival(festival_id) ON DELETE CASCADE
);

CREATE INDEX movie_index ON Movie(movie_id);