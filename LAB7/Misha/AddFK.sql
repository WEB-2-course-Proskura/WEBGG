ALTER TABLE Product
ADD FOREIGN KEY ([Type]) REFERENCES [Type](Id);

ALTER TABLE TVProgramm
ADD FOREIGN KEY (ChannelId) REFERENCES Channel(Id),
    FOREIGN KEY (ProductId) REFERENCES Product(Id);
