--테이블스페이스를 생성한다.
create tablespace space
datafile '/app/ora19c/oradata/ORCL/space.dbf' size 100m;

--개발자 계정을 생성한다.
create user dev
identified by dev
default tablespace space
temporary tablespace temp
quota unlimited on space;

grant create session, create table, create sequence, create trigger,create procedure, create view to dev;

--사용자 테이블과 시퀀스를 생성한다.
create table dev.users(
ino number,
id varchar2(100),
passwd varchar2(128),
cname varchar2(100),
constraint pk_id_ino primary key (ino)
);

create sequence dev.id_ino_seq;

--사용자 테이블에 데이터를 삽입한다.
insert into dev.users(ino, id, passwd, cname) values(dev.id_ino_seq.nextval, 'user1', RAWTOHEX(STANDARD_HASH('user1', 'SHA256')), '1번사용자');
insert into dev.users(ino, id, passwd, cname) values(dev.id_ino_seq.nextval, 'user2', RAWTOHEX(STANDARD_HASH('user2', 'SHA256')), '2번사용자');
insert into dev.users(ino, id, passwd, cname) values(dev.id_ino_seq.nextval, 'admin', RAWTOHEX(STANDARD_HASH('admin', 'SHA256')), '관리자');
commit;