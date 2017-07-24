select distinct game
from users join payments on users.id = payments.user_id 
where level > 10 
group by game, nickname having sum(amount) > 100