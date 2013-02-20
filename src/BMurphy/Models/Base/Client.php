<?php

namespace BMurphy\Models\Base;

/**
 * Base class of the BMurphy\Models\Client entity.
 */
abstract class Client implements \ArrayAccess
{
    protected $id;
    protected $user_id;
    protected $name;
    protected $description;
    protected $website;
    protected $image;
    protected $redirect_uri;
    protected $client_id;
    protected $client_secret;
    protected $created;
    protected $updated;
    protected $codes;
    protected $tokens;
    protected $user;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->codes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tokens = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set the id column value.
     *
     * @param mixed $value The column value.
     */
    public function setId($value)
    {
        $this->id = $value;
    }

    /**
     * Returns the id column value.
     *
     * @return mixed The column value.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the user_id column value.
     *
     * @param mixed $value The column value.
     */
    public function setUser_id($value)
    {
        $this->user_id = $value;
    }

    /**
     * Returns the user_id column value.
     *
     * @return mixed The column value.
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the name column value.
     *
     * @param mixed $value The column value.
     */
    public function setName($value)
    {
        $this->name = $value;
    }

    /**
     * Returns the name column value.
     *
     * @return mixed The column value.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the description column value.
     *
     * @param mixed $value The column value.
     */
    public function setDescription($value)
    {
        $this->description = $value;
    }

    /**
     * Returns the description column value.
     *
     * @return mixed The column value.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the website column value.
     *
     * @param mixed $value The column value.
     */
    public function setWebsite($value)
    {
        $this->website = $value;
    }

    /**
     * Returns the website column value.
     *
     * @return mixed The column value.
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set the image column value.
     *
     * @param mixed $value The column value.
     */
    public function setImage($value)
    {
        $this->image = $value;
    }

    /**
     * Returns the image column value.
     *
     * @return mixed The column value.
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the redirect_uri column value.
     *
     * @param mixed $value The column value.
     */
    public function setRedirect_uri($value)
    {
        $this->redirect_uri = $value;
    }

    /**
     * Returns the redirect_uri column value.
     *
     * @return mixed The column value.
     */
    public function getRedirect_uri()
    {
        return $this->redirect_uri;
    }

    /**
     * Set the client_id column value.
     *
     * @param mixed $value The column value.
     */
    public function setClient_id($value)
    {
        $this->client_id = $value;
    }

    /**
     * Returns the client_id column value.
     *
     * @return mixed The column value.
     */
    public function getClient_id()
    {
        return $this->client_id;
    }

    /**
     * Set the client_secret column value.
     *
     * @param mixed $value The column value.
     */
    public function setClient_secret($value)
    {
        $this->client_secret = $value;
    }

    /**
     * Returns the client_secret column value.
     *
     * @return mixed The column value.
     */
    public function getClient_secret()
    {
        return $this->client_secret;
    }

    /**
     * Set the created column value.
     *
     * @param mixed $value The column value.
     */
    public function setCreated($value)
    {
        $this->created = $value;
    }

    /**
     * Returns the created column value.
     *
     * @return mixed The column value.
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set the updated column value.
     *
     * @param mixed $value The column value.
     */
    public function setUpdated($value)
    {
        $this->updated = $value;
    }

    /**
     * Returns the updated column value.
     *
     * @return mixed The column value.
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set the codes association value.
     *
     * @param mixed $value The association value.
     */
    public function setCodes($value)
    {
        $this->codes = $value;
    }

    /**
     * Returns the codes association value.
     *
     * @return mixed The association value.
     */
    public function getCodes()
    {
        return $this->codes;
    }

    /**
     * Set the tokens association value.
     *
     * @param mixed $value The association value.
     */
    public function setTokens($value)
    {
        $this->tokens = $value;
    }

    /**
     * Returns the tokens association value.
     *
     * @return mixed The association value.
     */
    public function getTokens()
    {
        return $this->tokens;
    }

    /**
     * Set the user association value.
     *
     * @param mixed $value The association value.
     */
    public function setUser($value)
    {
        $this->user = $value;
    }

    /**
     * Returns the user association value.
     *
     * @return mixed The association value.
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set data by name.
     *
     * @param string $name  The data name.
     * @param mixed  $value The value.
     *
     * @throws \InvalidArgumentException If the data does not exists.
     */
    public function set($name, $value)
    {
        if ('id' == $name) {
            return $this->setId($value);
        }
        if ('user_id' == $name) {
            return $this->setUser_id($value);
        }
        if ('name' == $name) {
            return $this->setName($value);
        }
        if ('description' == $name) {
            return $this->setDescription($value);
        }
        if ('website' == $name) {
            return $this->setWebsite($value);
        }
        if ('image' == $name) {
            return $this->setImage($value);
        }
        if ('redirect_uri' == $name) {
            return $this->setRedirect_uri($value);
        }
        if ('client_id' == $name) {
            return $this->setClient_id($value);
        }
        if ('client_secret' == $name) {
            return $this->setClient_secret($value);
        }
        if ('created' == $name) {
            return $this->setCreated($value);
        }
        if ('updated' == $name) {
            return $this->setUpdated($value);
        }
        if ('codes' == $name) {
            return $this->setCodes($value);
        }
        if ('tokens' == $name) {
            return $this->setTokens($value);
        }
        if ('user' == $name) {
            return $this->setUser($value);
        }

        throw new \InvalidArgumentException(sprintf('The data "%s" does not exists.', $name));
    }

    /**
     * Get data by name.
     *
     * @param string $name  The data name.
     *
     * @return mixed The data.
     *
     * @throws \InvalidArgumentException If the data does not exists.
     */
    public function get($name)
    {
        if ('id' == $name) {
            return $this->getId();
        }
        if ('user_id' == $name) {
            return $this->getUser_id();
        }
        if ('name' == $name) {
            return $this->getName();
        }
        if ('description' == $name) {
            return $this->getDescription();
        }
        if ('website' == $name) {
            return $this->getWebsite();
        }
        if ('image' == $name) {
            return $this->getImage();
        }
        if ('redirect_uri' == $name) {
            return $this->getRedirect_uri();
        }
        if ('client_id' == $name) {
            return $this->getClient_id();
        }
        if ('client_secret' == $name) {
            return $this->getClient_secret();
        }
        if ('created' == $name) {
            return $this->getCreated();
        }
        if ('updated' == $name) {
            return $this->getUpdated();
        }
        if ('codes' == $name) {
            return $this->getCodes();
        }
        if ('tokens' == $name) {
            return $this->getTokens();
        }
        if ('user' == $name) {
            return $this->getUser();
        }

        throw new \InvalidArgumentException(sprintf('The data "%s" does not exists.', $name));
    }

    /**
     * Import data from an array.
     *
     * @param array $array An array.
     *
     * @return void
     */
    public function fromArray($array)
    {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        }
        if (isset($array['user_id'])) {
            $this->setUser_id($array['user_id']);
        }
        if (isset($array['name'])) {
            $this->setName($array['name']);
        }
        if (isset($array['description'])) {
            $this->setDescription($array['description']);
        }
        if (isset($array['website'])) {
            $this->setWebsite($array['website']);
        }
        if (isset($array['image'])) {
            $this->setImage($array['image']);
        }
        if (isset($array['redirect_uri'])) {
            $this->setRedirect_uri($array['redirect_uri']);
        }
        if (isset($array['client_id'])) {
            $this->setClient_id($array['client_id']);
        }
        if (isset($array['client_secret'])) {
            $this->setClient_secret($array['client_secret']);
        }
        if (isset($array['created'])) {
            $this->setCreated($array['created']);
        }
        if (isset($array['updated'])) {
            $this->setUpdated($array['updated']);
        }
    }

    /**
     * Export the data to an array.
     *
     * @return array An array with the data.
     */
    public function toArray($withAssociations = true)
    {
        $array = array();

        $array['id'] = $this->get('id');
        $array['user_id'] = $this->get('user_id');
        $array['name'] = $this->get('name');
        $array['description'] = $this->get('description');
        $array['website'] = $this->get('website');
        $array['image'] = $this->get('image');
        $array['redirect_uri'] = $this->get('redirect_uri');
        $array['client_id'] = $this->get('client_id');
        $array['client_secret'] = $this->get('client_secret');
        $array['created'] = $this->get('created');
        $array['updated'] = $this->get('updated');
        if ($withAssociations) {
            $array['user'] = $this->get('user') ? $this->get('user')->toArray($withAssociations) : null;
        }

        return $array;
    }

    /**
     * Load the metadata.
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $metadata The metadata class.
     */
    static public function loadMetadata(\Doctrine\ORM\Mapping\ClassMetadata $metadata)
    {
        $metadata->setChangeTrackingPolicy(\Doctrine\ORM\Mapping\ClassMetadata::CHANGETRACKING_DEFERRED_EXPLICIT);
        $metadata->setTableName('clients');
        $metadata->setCustomRepositoryClass('BMurphy\Models\ClientRepository');
        $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_AUTO);
        $metadata->mapField(array(
            'fieldName' => 'id',
            'type' => 'integer',
            'id' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'user_id',
            'type' => 'integer',
        ));
        $metadata->mapField(array(
            'fieldName' => 'name',
            'type' => 'string',
            'length' => 255,
        ));
        $metadata->mapField(array(
            'fieldName' => 'description',
            'type' => 'string',
            'length' => 1000,
            'nullable' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'website',
            'type' => 'string',
            'length' => 255,
            'nullable' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'image',
            'type' => 'string',
            'length' => 255,
            'nullable' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'redirect_uri',
            'type' => 'string',
            'length' => 255,
            'nullable' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'client_id',
            'type' => 'string',
            'length' => 255,
        ));
        $metadata->mapField(array(
            'fieldName' => 'client_secret',
            'type' => 'string',
            'length' => 255,
        ));
        $metadata->mapField(array(
            'fieldName' => 'created',
            'type' => 'datetime',
            'nullable' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'updated',
            'type' => 'datetime',
            'nullable' => true,
        ));
        $metadata->mapOneToMany(array(
            'fieldName' => 'codes',
            'targetEntity' => 'BMurphy\\Models\\Code',
            'cascade' => array(
                0 => 'persist',
                1 => 'remove',
            ),
            'mappedBy' => 'client',
        ));
        $metadata->mapOneToMany(array(
            'fieldName' => 'tokens',
            'targetEntity' => 'BMurphy\\Models\\AccessToken',
            'cascade' => array(
                0 => 'persist',
                1 => 'remove',
            ),
            'mappedBy' => 'client',
        ));
        $metadata->mapManyToOne(array(
            'fieldName' => 'user',
            'targetEntity' => 'BMurphy\\Models\\User',
            'cascade' => array(
                0 => 'persist',
                1 => 'remove',
            ),
            'inversedBy' => 'clients',
        ));
        $metadata->setLifecycleCallbacks(array(
            'prePersist' => array(
                0 => 'updateTimestampableCreated',
            ),
            'postPersist' => array(

            ),
            'preUpdate' => array(
                0 => 'updateTimestampableUpdated',
            ),
            'postUpdate' => array(

            ),
            'preRemove' => array(

            ),
            'postRemove' => array(

            ),
            'onFlush' => array(

            ),
            'postLoad' => array(

            ),
        ));
    }

    /**
     * Throws an \LogicException because you cannot check if data exists.
     *
     * @throws \LogicException
     */
    public function offsetExists($name)
    {
        throw new \LogicException('You cannot check if data exists in the entity.');
    }

    /**
     * Set data in the entity.
     *
     * @param string $name  The data name.
     * @param mixed  $value The value.
     *
     * @see set()
     */
    public function offsetSet($name, $value)
    {
        return $this->set($name, $value);
    }

    /**
     * Returns data of the entity.
     *
     * @param string $name The data name.
     *
     * @return mixed Some data.
     *
     * @see get()
     */
    public function offsetGet($name)
    {
        return $this->get($name);
    }

    /**
     * Throws a \LogicException because you cannot unset data in the entity.
     *
     * @throws \LogicException
     */
    public function offsetUnset($name)
    {
        throw new \LogicException('You cannot unset data in the entity.');
    }

    /**
     * Returns the entity manager.
     *
     * @return \Doctrine\ORM\EntityManager The entity manager.
     */
    static public function entityManager()
    {
        return \Doctrator\EntityManagerContainer::getEntityManager();
    }

    /**
     * Check if the entity manager is clear.
     *
     * @return void
     *
     * @throws \RuntimeException If the entity manager is not clear.
     */
    public function checkEntityManagerIsClear()
    {
        static $reflection;

        $unitOfWork = static::entityManager()->getUnitOfWork();

        if (null === $reflection) {
            $reflection = new \ReflectionProperty(get_class($unitOfWork), 'scheduledForDirtyCheck');
            $reflection->setAccessible(true);
        }

        if ($unitOfWork->hasPendingInsertions() || $reflection->getValue($unitOfWork) || $unitOfWork->getScheduledEntityDeletions()) {
            throw new \RuntimeException('The entity manager is not clear.');
        }
    }

    /**
     * Returns the repository.
     *
     * @return \Doctrine\ORM\EntityRepository The repository.
     */
    static public function repository()
    {
        return static::entityManager()->getRepository('BMurphy\Models\Client');
    }

    /**
     * Create a query builder for this entity name.
     *
     * @param string $alias The alias.
     *
     * @return \Doctrine\ORM\QueryBuilder A query builder
     */
    static public function queryBuilder($alias)
    {
        return static::repository()->createQueryBuilder($alias);
    }

    /**
     * Returns if the entity is new.
     *
     * @return bool If the entity is new.
     */
    public function isNew()
    {
        return !static::entityManager()->getUnitOfWork()->isInIdentityMap($this);
    }

    /**
     * Throws an \RuntimeException if the entity is not new.
     */
    public function checkIsNew()
    {
        if (!$this->isNew()) {
            throw new \RuntimeException('The entity is not new.');
        }
    }

    /**
     * Throws an \RuntimeException if the entity is new.
     */
    public function checkIsNotNew()
    {
        if ($this->isNew()) {
            throw new \RuntimeException('The entity is new.');
        }
    }

    /**
     * Returns if the entity is modified.
     *
     * @return bool If the entity is modified.
     */
    public function isModified()
    {
        return (bool) count($this->getModified());
    }

    /**
     * Throws an \RuntimeException if the entity is not modified.
     */
    public function checkIsModified()
    {
        if (!$this->isModified()) {
            throw new \RuntimeException('The entity is not modified.');
        }
    }

    /**
     * Throws an \RuntimeException if the entity is modified.
     */
    public function checkIsNotModified()
    {
        if ($this->isModified()) {
            throw new \RuntimeException('The entity is modified.');
        }
    }

    /**
     * Returns the entity modifications
     *
     * @return array The entity modifications.
     */
    public function getModified()
    {
        if ($this->isNew()) {
            return array();
        }

        $originalData = static::entityManager()->getUnitOfWork()->getOriginalEntityData($this);

        return array_diff($originalData, $this->toArray());
    }

    /**
     * Refresh the entity from the database.
     *
     * @return void
     */
    public function refresh()
    {
        static::entityManager()->getUnitOfWork()->refresh($this);
    }

    /**
     * Returns the change set of the entity.
     *
     * @return array The change set.
     */
    public function changeSet()
    {
        return static::entityManager()->getUnitOfWork()->getEntityChangeSet($this);
    }

    /**
     * Save the entity.
     */
    public function save()
    {
        $this->checkEntityManagerIsClear();

        $em = static::entityManager();

        $em->persist($this);
        $em->flush();
    }

    /**
     * Delete the entity.
     */
    public function delete()
    {
        $this->checkEntityManagerIsClear();

        $em = static::entityManager();

        $em->remove($this);
        $em->flush();
    }

    public function updateTimestampableCreated()
    {
        $this->setCreated(new \DateTime());
    }

    public function updateTimestampableUpdated()
    {
        $this->setUpdated(new \DateTime());
    }
}