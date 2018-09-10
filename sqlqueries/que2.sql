create table farmers(
    fid varchar(100),
    fname varchar(100),
    email varchar(200),
    address varchar(1000),
    pwd varchar(20),
    mbno bigint(10),
    constraint far_id_pk primary key(fid)
);


create table merchants(
    mid varchar(100),
    mname varchar(100),
    email varchar(200),
    address varchar(1000),
    pwd varchar(20),
    mbno bigint(10),
    constraint mer_mid_pk primary key(mid)
);


insert into farmers(fid,fname,email,address,pwd,mbno) values
('suraj232','suraj','suraj@gmail.com','buyegfuhewfwef','suraj','9858789825');


insert into merchants(mid,mname,email,address,pwd,mbno) values
('jeevan232','jeevan','jeevan@gmail.com','hiuewhbfiu','jeevan','9875478690');


create table crops(
    crop_id bigint(5) not null auto_increment,
    crop_name varchar(60),
    mid varchar(100),
    fid varchar(100),
    price bigint(10),
    qty bigint(5),
    status bigint(2),
constraint crop_pk primary key(crop_id)
)auto_increment=10000;

alter table crops add column reqdated date;
alter table crops add column rejdated date;

insert into crops(crop_name,mid,fid,price,qty,status,reqdated) values('','','','','','0',now());



select crop_id,crop_name,price,extract(year from reqdated) as year,qty,case status when 0 then 'Request' 
when 1 then 'Active' end as status,mname from crops c inner join  merchants m on c.mid=m.mid inner join 
farmers f on f.fid=c.fid  where c.status=0;


select * from farmers;

select * from crops;

delete from crops;