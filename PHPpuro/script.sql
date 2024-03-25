create table states
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255) not null
)

create table cities
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255)    not null,
    state_id   bigint unsigned not null,
    constraint cities_state_id_foreign
        foreign key (state_id) references states (id)
)

create table addresses
(
    id         bigint unsigned auto_increment
        primary key,
    street     varchar(255)    not null,
    city_id    bigint unsigned not null,
    state_id   bigint unsigned not null,
    constraint addresses_city_id_foreign
        foreign key (city_id) references cities (id),
    constraint addresses_state_id_foreign
        foreign key (state_id) references states (id)
)

create table users
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255)    not null,
    city_id    bigint unsigned not null,
    state_id   bigint unsigned not null,
    address_id bigint unsigned not null,
    constraint users_address_id_foreign
        foreign key (address_id) references addresses (id),
    constraint users_city_id_foreign
        foreign key (city_id) references cities (id),
    constraint users_state_id_foreign
        foreign key (state_id) references states (id)
)

