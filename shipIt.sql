start transaction;
SET autocommit=0;

select uid, iid, checkedOut from item where uid=26;
select uid, iid from cart where uid=26;
select concat(count(*), ' item(s)') from cart;

update item
join cart on item.uid=cart.uid and item.iid=cart.iid
set checkedOut = 'y'
where item.uid=26;

delete from cart where uid=26;

select uid, iid, checkedOut from item where uid=26;
select uid, iid from cart where uid=26;
select concat(count(*), ' item(s)') from cart;

rollback;

select uid, iid, checkedOut from item where uid=26;
select uid, iid from cart where uid=26;
select concat(count(*), ' item(s)') from cart;
