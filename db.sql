-- we don't know how to generate schema QuizApp (class Schema) :(
create table quiz
(
	id int(11) unsigned auto_increment
		primary key
)
;

create table question
(
	id int(11) unsigned auto_increment
		primary key,
	quiz_id int(11) unsigned not null,
	score int(11) unsigned not null,
	text varchar(255) null,
	constraint question_ibfk_1
		foreign key (quiz_id) references quiz (id)
			on update cascade on delete cascade
)
;

create table answer
(
	id int(11) unsigned auto_increment
		primary key,
	question_id int(11) unsigned not null,
	text varchar(255) null,
	constraint answer_ibfk_1
		foreign key (question_id) references question (id)
			on update cascade on delete cascade
)
;

create index question_id
	on answer (question_id)
;

create index quiz_id
	on question (quiz_id)
;

create table user
(
	id int(11) unsigned auto_increment
		primary key,
	email varchar(255) default '' not null
)
;

create table user_quiz
(
	user_id int(11) unsigned not null,
	quiz_id int(11) unsigned not null,
	score int(11) unsigned not null,
	constraint user_quiz_ibfk_1
		foreign key (user_id) references user (id)
			on update cascade on delete cascade,
	constraint user_quiz_ibfk_2
		foreign key (quiz_id) references quiz (id)
			on update cascade on delete cascade
)
;

create index quiz_id
	on user_quiz (quiz_id)
;

create index user_id
	on user_quiz (user_id)
;

