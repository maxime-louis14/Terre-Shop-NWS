SELECT * FROM images INNER JOIN produit ON produit.id_produit = images.produit;


create table images (
    image_type      varchar(25) not null default '',
    image           blob        not null,
    image_size      varchar(25) not null default '',
    image_ctgy      varchar(25) not null default '',
    image_name      varchar(50) not null default ''
)
