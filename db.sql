use event_booking;
create table users(
    id int auto_increment primary key,
    name varchar(100),
    email varchar(100) unique,
    password varchar(255)
);

create table events(
    id int auto_increment primary key,
    title varchar(255),
    description TEXT,
    data DATE,
    time Time,
    venue varchar(255),
    available_seat int
);

create table bookings(
    id int auto_increment primary key,
    user_id int,
    event_id int,
    booking_date timestamp default current_timestamp,
    foreign key (user_id) references users(id),
    foreign key (event_id) references events(id)
);